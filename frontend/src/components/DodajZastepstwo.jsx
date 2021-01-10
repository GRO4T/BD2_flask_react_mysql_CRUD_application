import React, { useState, useEffect } from 'react';
import { useLocation, useHistory } from 'react-router-dom';
import apiUrl from '../api-url';
import axios from 'axios';

function DodajZastepstwo(props) {

    const [msg, setMsg] = useState("");

    const [depts, setDepts] = useState([]);
    const [chosenDept, setChosenDept] = useState("");

    useEffect(() => {
        fetch(`${apiUrl}/api/getDzial`)
        .then(res => res.json())
        .then(body => setDepts(body))
        .catch(err => setMsg("Network error"));
    }, []);

  return (
    <>
        {msg &&
            <div className="alert alert-danger" role="alert">
              {msg}
            </div>
        }
        <h3>1. Wybierz dział</h3>
        <hr/>
        <div className="form-group row">
        <label htmlFor="dzial" className="col-sm-2 col-form-label">Dział</label>
        <div className="col-sm-4">
          <select id="dzial" className="form-control" value={chosenDept.name}
            onChange={event => setChosenDept({name: event.target.value, id: event.target.key})}>
            {depts.map(d =>
              <option value={d.name} key={d.id}>{d}</option>
            )}
          </select>
        </div>
      </div>
        <h3>2. Wybierz pracownika i nieobecność</h3>
        <hr/>
        <h3>3. Wybierz zastępstwo</h3>
    </>
  );
}

export default DodajZastepstwo;