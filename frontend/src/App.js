import Nav from './components/Nav';
import Index from './components/Index';
import Login from './components/Login';
import Dashboard from './components/Dashboard';
import DodajZastepstwo from './components/DodajZastepstwo';
import UserContext from './contexts/UserContext';
import apiUrl from './api-url';

import React, { useState, useEffect } from 'react';
import { BrowserRouter as Router, Switch, Route, Redirect} from 'react-router-dom';

function App() {

  const [user, setUser] = useState({
    username: "",
    token: "",
    id: ""
  });

  useEffect(() => {
    if(user.username){
      fetch(`${apiUrl}/api/employee/by-username/${user.username}`)
        .then(res => res.json())
        .then(body => setUser(u => ({...u, id: body[0].id})));
      }
  }, [user.username]);

  return (
    <UserContext.Provider value={{user, setUser}}>
      <Router>
        <Nav />
        {!user.id && 
          <Redirect to="/login" />
        }
        <div className="container">
          <main role="main" className="pb-3">
            <Switch>
              <Route exact path="/">
                {user.id
                  ? <Dashboard />
                  : <Index />
                }
              </Route>
              <Route exact path="/dodajZastepstwo">
                <DodajZastepstwo />
              </Route>
              <Route exact path="/login">
                <Login />
              </Route>
            </Switch>
          </main>
        </div>
      </Router>
    </UserContext.Provider>
  );
}

export default App;
