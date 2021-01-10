import React from 'react';
import { NavLink } from 'react-router-dom';
import UserContext from '../contexts/UserContext';

function Nav() {
  const { user, setUser } = React.useContext(UserContext);

  return (
    <header>
      <nav className="navbar navbar-expand-sm navbar-toggleable-sm navbar-dark bg-dark border-bottom box-shadow mb-3">
        <div className="container">
          <NavLink exact to="/" className="navbar-brand">Korpobaza</NavLink>
          <div className="navbar-collapse d-sm-inline-flex flex-sm-row-reverse">
            <ul className="navbar-nav flex-grow-1">
              {user.username &&
                <>
                  <li className="nav-item">
                    <NavLink exact to="/dodajNieobecnosc" className="nav-link text-light">Dodaj nieobecność</NavLink>
                  </li>
                  <li className="nav-item">
                    <NavLink exact to="/dodajZastepstwo" className="nav-link text-light">Dodaj zastępstwo</NavLink>
                  </li>
                  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                      <span className="text-white font-weight-bold">{user.username}</span>
                      <li className="nav-item">
                        <button className="btn btn-link text-light" onClick={() => setUser(o => ({ ...o, username: "" }))}>Wyloguj</button>
                      </li>
                    </form>
                  </div>
                </>
              }
              {!user.username &&
                <>
                  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                      <li className="nav-item">
                        <NavLink exact to="/login" className="nav-link text-light">Zaloguj</NavLink>
                      </li>
                    </form>
                  </div>
                </>
              }
            </ul>
          </div>
        </div>
      </nav>
    </header>
  );
}

export default Nav;