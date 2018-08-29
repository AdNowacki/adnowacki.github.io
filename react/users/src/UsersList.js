import React from "react";

class UsersList extends React.Component {



    render() {
        return (
            <ul className="the-list">
                {this.props.users.map((element, index) => <li onClick={()=>this.props.delete(index)} key={index}>{element}</li>)}
            </ul>
        );
    }
}


export default UsersList;