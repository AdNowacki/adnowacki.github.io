import React from "react";
import "./Users.css";
import UsersList from "./UsersList";

class Users extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            usersList: [],
        }
    }

    deleteUser = (index) => {
        let filteredArray = this.state.usersList.filter( (user, userIndex) => index !== userIndex );
        this.session(filteredArray);
        this.setState((old) => {
            return {
                usersList: filteredArray,
            }
        });
    }

    componentDidMount() {
        if( localStorage.getItem("data") ) {
            this.setState((old) => {
                return {
                    usersList: JSON.parse( localStorage.getItem("data") ),
                }
            })
        }
    }

    render() {
        return (
            <div className="users-main">
                <h1>Users's list</h1>
                <form onSubmit={this.addUser}>
                    <input type="text" placeholder="Enter name" ref={(name) => this.name = name} />
                    <button>Add user</button>
                </form>
                <UsersList delete={this.deleteUser} users={this.state.usersList} />
            </div>
        );
    }

    addUser = (event) => {
        document.getElementsByTagName("input")[0].classList.remove('error');
        event.preventDefault();
        let val = this.name.value;
        if( val === "" ) {
            document.getElementsByTagName("input")[0].classList.add('error');
            return false;
        }
        this.name.value = null;
        this.setState( (oldArr) => {
            var session = oldArr.usersList.concat(val);
            this.session(session);
            return {
                usersList: oldArr.usersList.concat(val),
            }
        } );
    }

    session(val) {
        localStorage.setItem("data", JSON.stringify(val));
    }

 
}


export default Users;