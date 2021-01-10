import React, { useState, useEffect } from 'react';
import { useLocation, useHistory } from 'react-router-dom';
import apiUrl from '../api-url';
import axios from 'axios';
import ActivityFormField from './ActivityFormField';

function useQuery() {
  return new URLSearchParams(useLocation().search);
}

function ActivityDetails(props) {

  const query = useQuery();
  const history = useHistory();

  const [validData, setValidData] = useState({
    rooms: [],
    groups: [],
    subjects: [],
    teachers: []
  });

  const [activity, setActivity] = useState({
    slot: "",
    room: "",
    group: "",
    subject: "",
    teacher: ""
  });

  const [newActivity, setNewActivity] = useState({
    slot: "",
    room: "",
    group: "",
    subject: "",
    teacher: ""
  });

  const [message, setMessage] = useState({
    success: "",
    danger: ""
  });

  useEffect(() => {
    fetch(`${apiUrl}/api/activities?slot=${query.get('slot')}&room=${query.get('room')}`)
      .then(res => res.json())
      .then(body => {
        if (Array.isArray(body) && body.length) {
          setActivity(body[0]);
          setNewActivity(body[0]);
        } else {
          setMessage({ danger: "Activity doesn't exist!" });
        }
      })
      .catch(() => setMessage({ danger: "Couldn't fetch activity!" }));

    fetch(`${apiUrl}/api/activities/valid-data/${query.get('slot')}?room=${query.get('room')}`)
      .then(res => res.json())
      .then(body => {
        setValidData(body);
      })
      .catch(() => setMessage({ danger: "Couldn't fetch activity!" }));
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, []);

  const handleSubmit = event => {
    axios.put(`${apiUrl}/api/activities`, {
      old: activity,
      new: newActivity
    })
      .then(res => {
        if (res.status === 200) {
          setMessage({ success: "Saved successfully!" });
          setActivity({ ...newActivity });
        }
      })
      .catch(err => {
        setMessage({
          danger: `Something went wrong: ${err.response?.data?.message}`
        });
      });
    event.preventDefault();
  };

  const handleDelete = event => {
    axios.delete(`${apiUrl}/api/activities`, {
      data: {
        ...activity
      }
    })
      .then(res => {
        if (res.status === 200) {
          history.push('/plans');
        }
      })
      .catch(err => {
        setMessage({
          danger: `Something went wrong: ${err.response?.data?.message}`
        });
      });
  };

  return (
    <>
      <h1>Activity details</h1>
      <hr />

      {message.danger &&
        <div className="alert alert-danger" role="alert">
          {message.danger}
        </div>
      }

      {message.success &&
        <div className="alert alert-success" role="alert">
          {message.success}
        </div>
      }

      <form id="form" onSubmit={handleSubmit}>
        <div className="form-group row">
          <label htmlFor="slot" className="col-sm-2 col-form-label">Slot</label>
          <div className="col-sm-4">
            <input type="text" readOnly className="form-control-plaintext" id="slot" value={activity.slot} />
          </div>
        </div>
        <ActivityFormField field="room" value={newActivity.room}
          setNewActivityCallback={setNewActivity} validDataList={validData.rooms} />
        <ActivityFormField field="group" value={newActivity.group}
          setNewActivityCallback={setNewActivity} validDataList={validData.groups} />
        <ActivityFormField field="subject" value={newActivity.subject}
          setNewActivityCallback={setNewActivity} validDataList={validData.subjects} />
        <ActivityFormField field="teacher" value={newActivity.teacher}
          setNewActivityCallback={setNewActivity} validDataList={validData.teachers} />
      </form>

      <div className="mt-4">
        <button type="button" className="btn btn-danger mr-2" onClick={handleDelete}>Delete</button>
        <button type="submit" className="btn btn-success mr-2" form="form">Save</button>
        <button type="button" className="btn btn-secondary mr-2" onClick={history.goBack}>Go back</button>
      </div>
    </>
  );
}

export default ActivityDetails;