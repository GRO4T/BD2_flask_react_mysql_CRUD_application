import React, { useState, useEffect } from 'react';
import apiUrl from '../api-url';
import UserContext from '../contexts/UserContext';
import axios from 'axios';

function EdytujSlownik(props) {

  const { user } = React.useContext(UserContext);

  const [msg, setMsg] = useState("");

  const [dict, setDict] = useState([]);

  const [emps, setEmps] = useState([]);
  const [chosenEmp, setChosenEmp] = useState({ id: -1 });
  const [chosenEmp2, setChosenEmp2] = useState({ id: -1 });

  const [skills, setSkills] = useState([]);
  const [skills2, setSkills2] = useState([]);

  useEffect(() => {
    fetchDict();
    fetch(`${apiUrl}/api/employee/by-superior/${user.id}`)
      .then(res => {
        if (res.status === 200) {
          return res.json();
        }
      })
      .then(body => {
        if (!body.length) {
          setMsg({ bad: "Brak uprawnień lub brak podwładnych." })
        } else {
          setEmps([
            { name: "", id: -1 },
            ...body.map(p => ({
              id: p.id,
              name: `${p.imie} ${p.nazwisko}`
            }))
          ]);
        }
      })
      .catch(err => setMsg({ bad: "Network error" }));
  }, [user.id]);

  useEffect(() => fetchSkills(1), [chosenEmp]);
  useEffect(() => fetchSkills(2), [chosenEmp2]);

  const fetchSkills = (emp) => {
    const id = emp === 2 ? chosenEmp2?.id : chosenEmp?.id;
    if (!id || parseInt(id) === -1) {
      emp === 2
        ? setSkills2([])
        : setSkills([]);
      return;
    }
    axios.post(`${apiUrl}/api/skills`, {
      id_pracownika: id
    })
      .then(res => {
        emp === 2
          ? setSkills2(res.data)
          : setSkills(res.data);
      })
      .catch(err => setMsg({ bad: "Network error" }))
  }

  const fetchDict = () => {
    axios.get(`${apiUrl}/api/sub-dict/by-superior/${user.id}`)
      .then(res => {
        setDict(res.data);
      })
      .catch(err => setMsg({ bad: "Network error" }));
  }

  const handleDelete = e => {
    axios.delete(`${apiUrl}/api/sub-dict/${e.target.value}`)
      .then(res => fetchDict())
      .catch(err => setMsg({ bad: "Possibly critical server error" }));
  }

  const handleSubmit = () => {
    axios.post(`${apiUrl}/api/sub-dict`, {
      kto: chosenEmp2.id,
      kogo: chosenEmp.id
    })
      .then(res => {
        setMsg({ ok: "Dodano wpis" });
        fetchDict();
      })
      .catch(err => {
        setMsg({ bad: "Błędne dane" });
      })
  }

  return (
    <>
      {msg.bad &&
        <div className="alert alert-danger mt-2" role="alert">
          {msg.bad}
        </div>
      }
      {msg.ok &&
        <div className="alert alert-success mt-2" role="alert">
          {msg.ok}
        </div>
      }

      {emps.length > 0 &&
        <>
          <div className="container">
            <div className="row mb-3">
              <div className="col-sm">
                <select id="pracownik" className="form-control" value={chosenEmp?.id}
                  onChange={event => setChosenEmp({ id: event.target.value })}>
                  {emps.map(d =>
                    <option value={d.id} key={d.id}>{d.name}</option>
                  )}
                </select>
              </div>
              <div className="col-sm">
                <select id="pracownik2" className="form-control" value={chosenEmp2?.id}
                  onChange={event => setChosenEmp2({ id: event.target.value })}>
                  {emps.map(d =>
                    <option value={d.id} key={d.id}>{d.name}</option>
                  )}
                </select>
              </div>
            </div>
          </div>
          <div className="container">
            <div className="row">
              <div className="col-sm">
                <div className="alert alert-primary">
                  Kompetencje: <br />
                  {skills.map(s =>
                    <span key={s.id}>{s.nazwa}<br /></span>
                  )}
                </div>
              </div>
              <div className="col-sm">
                <div className="alert alert-primary">
                  Kompetencje: <br />
                  {skills2.map(s =>
                    <span key={s.id}>{s.nazwa}<br /></span>
                  )}
                </div>
              </div>
            </div>
          </div>
          <div className="container">
            <div className="row">
              <div className="col-sm text-center">
                <button className="btn btn-primary w-50" onClick={handleSubmit}>Dodaj wpis</button>
              </div>
            </div>
          </div>
          <hr />

          <table className="table table-hover table-dark" style={{ tableLayout: "fixed" }}>
            <thead>
              <tr>
                <th scope="col">Za</th>
                <th scope="col">Kto</th>
                <th scope="col">Akcja</th>
              </tr>
            </thead>
            <tbody>
              {dict.map(a => (
                <tr key={a.id}>
                  <td>{a.pracownik_kogo}</td>
                  <td>{a.pracownik_kto}</td>
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
      }
    </>
  );
}

export default EdytujSlownik;