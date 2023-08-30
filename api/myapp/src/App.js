//import logo from './logo.svg';
import './App.css';
// import Hello from './components/Hello';
import React, { Component } from 'react';
// import Greet from './components/Greet';
// import Greeting from './components/Greeting';
// import Namelist from './components/Namelist';
// import Welcome from './components/Welcome';
// import Message  from './components/Message';
// import Like from './components/Like';
// import Count from './components/Count';
// import Form from './components/Form';
import Tour from './components/Tour'
class App extends Component {
  render() {
    return (
      <div className='App'>
        {/* <Greet name="Mahin" relation="I am Big brother">
          <p>I am learning!</p>
        </Greet>
        <Greet name="Jannat" relation="Sister of mine"/>
        <Greet name="Anha" relation="Cousine"/>
        <Welcome s="submit">
          <button>Welcome</button>
        </Welcome>
        <br></br>
        <Hello thank="thank">
        <p>I love you everyone</p>
        <button>Welcome</button>
        </Hello> */}

        {/* <Message>
        </Message>
        <Like></Like> */}
        {/*        
        <Count></Count> */}
        {/* <Greet name="Mahin" relation="I am Big brother"></Greet> */}
        {/* <Greeting></Greeting> */}
        {/* <Namelist primary = {true}></Namelist> */}
        {/* <Form></Form> */}
        <Tour></Tour>

      </div>
    );
  }
}

export default App;
