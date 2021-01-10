import React, { useState, useEffect } from 'react';
import { NavLink } from 'react-router-dom';
import apiUrl from '../api-url';

function Plan() {
  const colHeaders = ["Time", "Mon", "Tue", "Wed", "Thu", "Fri"];

  const times = ["8:00 - 8:45", "8:55 - 9:40", "9:50 - 11:35",
    "11:55 - 12:40", "12:50 - 13:35", "13:45 - 14:30",
    "14:40 - 15:25", "15:35 - 16:20", "16:30 - 17:15"];

  const [groups, setGroups] = useState({
    isValid: true,
    current: undefined,
    list: []
  });

  const [activities, setActivities] = useState({
    isValid: true,
    list: []
  });

  useEffect(() => {
    fetch(`${apiUrl}/api/groups`)
      .then(res => res.json())
      .then(body => {
        if (Array.isArray(body) && body.length) {
          setGroups({
            isValid: true,
            current: body[0],
            list: body
          });
        }
      })
      .catch(() => setGroups({ isValid: false }));
  }, []);

  useEffect(() => {
    if (groups.current) {
      fetch(`${apiUrl}/api/activities?group=${groups.current}`)
        .then(res => res.json())
        .then(body => {
          if (Array.isArray(body)) {
            setActivities({
              isValid: true,
              list: body
            });
          }
        })
        .catch(() => setActivities({ isValid: false }));
    }
  }, [groups]);

  const handleGroupChange = (event) => {
    setGroups(groups => ({ ...groups, current: event.target.value }));
  };

  const tableCells = []

  for (let i = 0; i < times.length; ++i) {
    for (let j = 1; j <= 5; ++j) {
      const slot = (i * 5) + j;
      const activity = activities.list?.find(a => parseInt(a.slot) === slot);
      if (activity) {
        tableCells.push(
          <NavLink exact to={`/activity/details?slot=${slot}&room=${activity.room}`} style={{ cursor: "default" }}
            className="d-table w-100 h-100 text-reset text-decoration-none text-center">
            <span className="d-table-cell align-middle">
              <span>{activity.room} {activity.subject}</span>
            </span>
          </NavLink>
        );
      } else {
        tableCells.push(
          <NavLink exact to={`/activity/new?slot=${slot}`} style={{ cursor: "default" }} className="d-table w-100 h-100"> </NavLink>
        );
      }
    }
  }

  return (
    <>
      <h1>Activities by a Classgroup</h1>

      {!groups.isValid &&
        <div className="alert alert-danger" role="alert">
          Couldn't fetch classgroups or the list is empty!
        </div>
      }

      {!activities.isValid &&
        <div className="alert alert-danger" role="alert">
          Couldn't fetch activities!
        </div>
      }

      <div className="form-group row">
        <label htmlFor="filter" className="col-sm-2 col-form-label">Classgroup</label>
        <div className="col-sm-10">
          <select id="filter" className="form-control" value={groups.current} onChange={handleGroupChange}>
            {groups.list?.map(g =>
              <option key={g} value={g}>{g}</option>
            )}
          </select>
        </div>
      </div>

      <table className="table table-bordered table-dark" style={{ tableLayout: "fixed" }}>
        <thead>
          <tr>
            {colHeaders.map((h, i) =>
              <th scope="col" key={i}>{h}</th>
            )}
          </tr>
        </thead>
        <tbody>
          {times.map((t, i) =>
            <tr key={i}>
              <th scope="row">{t}</th>
              {[1, 2, 3, 4, 5].map(j =>
                <td className="p-0 h-100" key={j}>
                  {tableCells[(i * 5) + j - 1]}
                </td>
              )}
            </tr>
          )}
        </tbody>
      </table>
    </>
  );
}

export default Plan;