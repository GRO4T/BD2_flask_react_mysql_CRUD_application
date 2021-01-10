import axios from 'axios';
import React, { useState } from 'react';
import apiUrl from '../api-url';

function Teacher(props) {

  const [state, setState] = useState({
    confirmDelete: false,
    confirmEdit: false,
    message: ""
  });

  const [editableName, setEditableName] = useState(props.name);

  const handleDelete = event => {
    fetch(`${apiUrl}/api/teachers/${props.name}`)
      .then(res => res.json())
      .then(body => {
        if (body.assignedActivities === 0) {
          setState({
            confirmDelete: true,
            message: `Are you sure?`
          })
        } else {
          setState({
            confirmDelete: true,
            message: `Are you sure? ${body.name} has ${body.assignedActivities} assigned activities.`
          })
        }
      })
      .catch(() => setState(oldState => ({
        ...oldState,
        message: "Something went wrong :("
      })));
  };

  const handleDeleteConfirmation = event => {
    axios.delete(`${apiUrl}/api/teachers`, {
      data: {
        name: props.name
      }
    })
      .then(res => {
        if (res.status === 200) {
          props.fetchTeachersCallback();
        }
      })
      .catch(err => {
        setState({
          confirmDelete: false,
          message: `Something went wrong: ${err.response?.data?.message}`
        });
      });
  };

  const handleEdit = event => {
    setState({
      confirmDelete: false,
      confirmEdit: true,
      message: ""
    });
    setEditableName(props.name);
  };

  const handleEditConfirmation = event => {
    axios.put(`${apiUrl}/api/teachers`, {
      name: props.name,
      newName: editableName
    })
      .then(res => {
        if (res.status === 200) {
          props.fetchTeachersCallback();
        }
      })
      .catch(err => {
        setState({
          confirmEdit: false,
          message: `Something went wrong: ${err.response?.data?.message}`
        });
      });
  };

  const handleCancel = () => {
    setState({
      confirmDelete: false,
      confirmEdit: false,
      message: ""
    });
  }

  return (
    <>
      <tr>
        <td>
          {state.confirmEdit
            ? <input type="text" value={editableName} onChange={e => setEditableName(e.target.value)} />
            : props.name
          }
        </td>
        <td className="w100">
          <div className="float-right">
            <div className="d-inline-block mr-2 text-danger font-weight-bold">{state.message}</div>
            {!state.confirmDelete && !state.confirmEdit &&
              <>
                <button type="button" className="btn btn-warning btn-sm mr-2" onClick={handleDelete}>Delete</button>
                <button type="button" className="btn btn-success btn-sm" onClick={handleEdit}>Edit</button>
              </>
            }
            {state.confirmDelete &&
              <button type="button" className="btn btn-danger btn-sm mr-2" onClick={handleDeleteConfirmation}>Delete</button>
            }
            {state.confirmEdit &&
              <button type="button" className="btn btn-success btn-sm mr-2" onClick={handleEditConfirmation}>Save</button>
            }
            {(state.confirmDelete || state.confirmEdit) &&
              <button type="button" className="btn btn-secondary btn-sm" onClick={handleCancel}>Cancel</button>
            }
          </div>
        </td>
      </tr>
    </>
  );
}

export default Teacher;