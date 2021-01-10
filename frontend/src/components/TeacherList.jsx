import React, { useState, useEffect, useCallback } from 'react';
import Teacher from './Teacher';
import apiUrl from '../api-url';
import axios from 'axios';

function TeacherList() {

  const [teachers, setTeachers] = useState({
    isValid: true,
    list: []
  });

  const [newTeacher, setNewTeacher] = useState({
    wasSubmitted: false,
    wasSuccess: false,
    value: "",
    message: ""
  });

  const fetchTeachers = useCallback(() => {
    fetch(`${apiUrl}/api/teachers`)
      .then(res => res.json())
      .then(body => {
        if (Array.isArray(body)) {
          setTeachers({
            isValid: true,
            list: body
          });
        }
      })
      .catch(() => setTeachers({ isValid: false }));
  }, []);

  useEffect(() => {
    fetchTeachers();
  }, [fetchTeachers]);

  const handleNewTeacherChange = event => {
    setNewTeacher(oldTeacher => ({ ...oldTeacher, value: event.target.value }));
  }

  const handleNewTeacherSubmit = event => {
    axios.post(`${apiUrl}/api/teachers`, {
      name: newTeacher.value
    })
      .then(res => {
        if (res.status === 200) {
          setNewTeacher({
            wasSubmitted: true,
            wasSuccess: true,
            value: ""
          });
          fetchTeachers();
        }
      })
      .catch(err => {
        setNewTeacher({
          wasSubmitted: true,
          wasSuccess: false,
          value: "",
          message: err.response.data.message
        });
      });
    event.preventDefault();
  }

  return (
    <>
      <h1>Teachers</h1>

      {newTeacher.wasSubmitted && newTeacher.wasSuccess &&
        <div className="alert alert-success" role="alert">
          New teacher added!
        </div>
      }

      {newTeacher.wasSubmitted && !newTeacher.wasSuccess &&
        <div className="alert alert-danger" role="alert">
          Server: {newTeacher.message}
        </div>
      }

      <form className="form-inline mb-2" onSubmit={handleNewTeacherSubmit}>
        <div className="form-group mx-sm-3 mb-2">
          <label htmlFor="newTeacherInput" className="sr-only">New teacher name</label>
          <input type="text" className="form-control" id="newTeacherInput" placeholder="New teacher name"
            value={newTeacher.value} onChange={handleNewTeacherChange} />
        </div>
        <button type="submit" className="btn btn-primary mb-2">Create</button>
      </form>

      {!teachers.isValid &&
        <div className="alert alert-danger" role="alert">
          Couldn't fetch teachers!
        </div>
      }

      <table className="table">
        <thead>
          <tr>
            <th>Name</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          {teachers.list?.map(t =>
            <Teacher name={t} key={t} fetchTeachersCallback={fetchTeachers} />
          )}
        </tbody>
      </table>
    </>
  );
}

export default TeacherList;