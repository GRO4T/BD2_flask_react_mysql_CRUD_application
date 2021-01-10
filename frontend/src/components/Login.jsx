import React, { useState, useEffect } from 'react';
import { useLocation, useHistory, Redirect } from 'react-router-dom';
import apiUrl from '../api-url';
import axios from 'axios';
import UserContext from '../contexts/UserContext';

function Login(props) {

  const { user, setUser } = React.useContext(UserContext);

  const [form, setForm] = useState({
    user: "",
    password: ""
  });

  const [msg, setMsg] = useState("");

  // useEffect(() => {
  //   fetch(`${apiUrl}/api/getDzial`)
  //     .then(res => res.json())
  //     .then(body => setDepts(body))
  //     .catch(err => setMsg("Network error"));
  // }, []);

  const handleSubmit = e => {

    e.preventDefault();
  }

  return (
    <>

      {user.username &&
        <Redirect to="/" />
      }
      {msg &&
        <div className="alert alert-danger" role="alert">
          {msg}
        </div>
      }
      <form className="mx-auto col-sm-6" onSubmit={handleSubmit}>
        <div className="form-group">
          <label htmlFor="exampleInputEmail1">Użytkownik</label>
          <input type="text" className="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value={form.user} onChange={e => setForm(o => ({...o, user: e.target.value}))} />
        </div>
        <div class="form-group">
          <label htmlFor="exampleInputPassword1">Hasło</label>
          <input type="password" className="form-control" id="exampleInputPassword1" value={form.password} onChange={e => setForm(o => ({...o, password: e.target.value}))} />
        </div>
        <button type="submit" className="btn btn-primary">Zaloguj</button>
      </form>
    </>
  );
}

export default Login;