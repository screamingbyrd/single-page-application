import {createStore, combineReducers} from "redux";
import contactReducer from './reducers/contact';

const rootReducer = combineReducers({contactReducer});
declare let window: {
    __REDUX_DEVTOOLS_EXTENSION__: any;
};

export default createStore(
    rootReducer,
    window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()
);
