import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router } from 'react-router-dom';
import '../css/app.css';
import Home from './components/Home';
import { Provider } from 'react-redux'
import rootReducer from './rootReducer'

ReactDOM.render(
    <Provider store={rootReducer}>
        <Router>
            <Home />
        </Router>
    </Provider>,
    document.getElementById('root')
);