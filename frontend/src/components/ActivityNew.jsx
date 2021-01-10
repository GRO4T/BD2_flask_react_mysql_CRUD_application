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

  const [newActivity, setNewActivity] = useState({
    slot: parseInt(query.get('slot')),
    room: "",
    group: "",
    subject: "",
    teacher: ""
  });

  const [message, setMessage] = useState({
    danger: ""
  });

  useEffect(() => {
    fetch(`${apiUrl}/api/activities/valid-data/${query.get('slot')}`)
      .then(res => res.json())
      .then(body => {
        setValidData({
          rooms: ["", ...body.rooms],
          groups: ["", ...body.groups],
          subjects: ["", ...body.subjects],
          teachers: ["", ...body.teachers]
        });
      })
      .catch(() => setMessage({ danger: "Couldn't fetch activity!" }));
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, []);

  const handleSubmit = event => {
    axios.post(`${apiUrl}/api/activities`, {
      ...newActivity
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
    event.preventDefault();
  };

  return (
    <>
      <h1>Create activity</h1>
      <hr />

      {message.danger &&
        <div className="alert alert-danger" role="alert">
          {message.danger}
        </div>
      }

      <form id="form" onSubmit={handleSubmit}>
        <div className="form-group row">
          <label htmlFor="slot" className="col-sm-2 col-form-label">Slot</label>
          <div className="col-sm-4">
            <input type="text" readOnly className="form-control-plaintext" id="slot" value={query.get('slot')} />
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
        <button type="submit" className="btn btn-primary mr-2" form="form">Create</button>
        <button type="button" className="btn btn-secondary mr-2" onClick={history.goBack}>Go back</button>
      </div>
    </>
  );
}

export default ActivityDetails;