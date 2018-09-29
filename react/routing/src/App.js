import React, { Component } from 'react';
import './semantic/dist/semantic.min.css';
import MainNav from './components/MainNav';

class App extends Component {
  render() {
    return (
      <div className="App">
        <MainNav />
      </div>
    );
  }
}

export default App;
