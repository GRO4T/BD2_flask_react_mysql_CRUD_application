import React, { useState, useEffect } from 'react';
import apiUrl from '../api-url';
import UserContext from '../contexts/UserContext';
import axios from 'axios';

function DodajNieobecnosc(props) {

  const { user } = React.useContext(UserContext);

  const [msg, setMsg] = useState("");

  const [emps, setEmps] = useState([]);
  const [abs, setAbs] = useState([]);
  const [chosenEmp, setChosenEmp] = useState("");

  useEffect(() => {
    fetch(`${apiUrl}/api/employee/by-superior/${user.id}`)
      .then(res => {
        if (res.status === 200) {
          return res.json();
        }
      })
      .then(body => {
        if (!body.length) {
          setMsg("Brak uprawnień lub brak podwładnych.")
        } else {
          setEmps(body.map(p => ({
            id: p.id,
            name: `${p.imie} ${p.nazwisko}`
          })));
        }
      })
      .catch(err => setMsg("Network error"));
  }, [user.id]);

  useEffect(() => {
    setChosenEmp(emps[0]);
  }, [emps])

  useEffect(() => {
    if(chosenEmp?.id || chosenEmp?.id === 0){
      fetchAbs();
    }
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [chosenEmp]);

  const fetchAbs = () => {
    axios.get(`${apiUrl}/api/absence/by-emp-id/${chosenEmp.id}`)
    .then(res => {
      const conv = res.data.map(a => ({
        from: new Date(a.poczatek.substring(5)),
        to: new Date(a.koniec.substring(5)),
        id: a.id
      }));
      const date = new Date();
      const yest = date.setDate(date.getDate() - 1);
      const filter = conv.filter(c => c.to >= yest);
      filter.sort((a, b) => a.from - b.from);
      setAbs(filter);
    })
    .catch(err => setMsg("Network error"));
  }

  const handleDelete = e => {
    axios.delete(`${apiUrl}/api/absence/${e.target.value}`)
    .then(res => fetchAbs());
  }

  return (
    <>
      {msg &&
        <div className="alert alert-danger" role="alert">
          {msg}
        </div>
      }
      <div className="form-group row">
        <label htmlFor="pracownik" className="col-sm-2 col-form-label">Pracownik</label>
        <div className="col-sm-4">
          <select id="pracownik" className="form-control" value={chosenEmp?.id}
            onChange={event => setChosenEmp({ id: event.target.value })}>
            {emps.map(d =>
              <option value={d.id} key={d.id}>{d.name}</option>
            )}
          </select>
        </div>
      </div>
      <hr />
      <table className="table table-hover table-dark" style={{tableLayout: "fixed"}}>
        <thead>
          <tr>
            <th scope="col">Od</th>
            <th scope="col">Do</th>
            <th scope="col">Akcja</th>
          </tr>
        </thead>
        <tbody>
          {abs.map(a => (
            <tr key={a.from}>
              <td>{a.from.toLocaleDateString('pl-PL')}</td>
              <td>{a.to.toLocaleDateString('pl-PL')}</td>
              <td>
                <button type="button" className="btn btn-danger btn-sm" value={a.id} onClick={handleDelete}>
                  Usuń
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>

    </>
  );
}

export default DodajNieobecnosc;