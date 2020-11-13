import {combineReducers} from "redux";
import {ContactAction, INCREMENT_CONTACT} from "../actions/contact";


const initialState = {
    count: 0
};

const contact = (state = initialState, action:ContactAction) => {
    switch (action.type) {
        case INCREMENT_CONTACT:
            return {
                count: state.count + 1
            };
        default:
            return state;
    }
}

export default combineReducers({contact})
