import Nav from './components/Nav';
import Index from './components/Index';
import Plan from './components/Plan';
import TeacherList from './components/TeacherList';
import ActivityDetails from './components/ActivityDetails';
import Login from './components/Login';
import DodajZastepstwo from './components/DodajZastepstwo';
import UserContext from './contexts/UserContext';

import React, { useState, useEffect } from 'react';
import { BrowserRouter as Router, Switch, Route, Redirect} from 'react-router-dom';

function App() {

  const [user, setUser] = useState({
    username: ""
  });

  useEffect(() => {
    if(!user.username){

    }
  }, []);


  return (
    <UserContext.Provider value={{user, setUser}}>
      <Router>
        <Nav />
        {!user.username && 
          <Redirect to="/login" />
        }
        <div className="container">
          <main role="main" className="pb-3">
            <Switch>
              <Route exact path="/">
                {user.username
                  ? <Index />
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
