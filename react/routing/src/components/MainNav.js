import React from 'react';
import {BrowserRouter as Router, Route, Switch, Link, NavLink} from 'react-router-dom';
import Home from './Home';
import Books from './Books';
import Contact from './Contact';

const MainNav = (props) => {
    return (
        <Router>
            <nav className='x-main-nav'>
                {/* 
                    NavLink - linki zarządzające Routingiem. W NavLink można ustawić activeClassName
                    dzięki czemu można dodać aktywną klasę do klikniętego linku
                */}
                <div className="ui pointing menu">
                    <NavLink exact activeClassName="active" className="item" to="/">Home</NavLink>
                    <NavLink activeClassName="active" className="item" to="/books">Books</NavLink>
                    <NavLink activeClassName="active" className="item" to="/contact">Contact</NavLink>
                </div>
                <Route exact path="/" component={Home}>Home</Route>
                <Route path="/books" component={Books}>Books</Route>
                <Route path="/contact" component={Contact}>Contact</Route>
            </nav>
        </Router>
    )
}

export default MainNav;