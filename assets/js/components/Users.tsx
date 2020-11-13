import React, {Component} from 'react';
import axios from 'axios';
import ContactButton from './ContactButton';
import { connect } from "react-redux";
import {incrementContact} from "../actions/contact";

interface UsersState {
    loading: boolean,
    users: Array<any>
}

interface UsersProps {
    count: number,
    incrementCount: () => void
};

class Users extends React.Component<UsersProps, UsersState> {
    constructor(props:UsersProps) {
        super(props);
        this.state = { users: [], loading: true};
    }

    componentDidMount() {
        this.getUsers();
        this.props.incrementCount();
    }

    getUsers() {
        axios.get(`http://localhost:8000/api/users`).then(users => {
            this.setState({ users: users.data, loading: false})
        })
    }

    render() {
        const loading = this.state.loading;
        return(
            <div>
                <section className="row-section">
                    <div className="container">
                        <div className="row">
                            <h2 className="text-center"><span>List of users</span></h2>
                            <h3 className="text-center">Page displayed {this.props.count} times</h3>
                        </div>
                        {loading ? (
                            <div className={'row text-center'}>
                            <span className="fa fa-spin fa-spinner fa-4x"></span>
                            </div>
                        ) : (
                            <div className={'row'}>
                                { this.state.users.map(user =>
                                    <div className="col-md-10 offset-md-1 row-block" key={user.id}>
                                        <ul id="sortable">
                                            <li>
                                                <div className="media">
                                                    <div className="media-left align-self-center">
                                                        <img className="rounded-circle" src={user.imageURL}/>
                                                    </div>
                                                    <div className="media-body">
                                                        <h4>{user.name}</h4>
                                                        <p>{user.description}</p>
                                                    </div>
                                                    <div className="media-right align-self-center">
                                                        <ContactButton/>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                )}
                            </div>
                        )}
                    </div>
                </section>
            </div>
        )
    }
}
function mapDispatchToProps(dispatch) {
    return {
        incrementCount: () => dispatch(incrementContact()),
    };
}

function mapStateToProps(state) {
    return {
      count: state.contactReducer.contact.count
    };
 }
export default connect(mapStateToProps, mapDispatchToProps)(Users);