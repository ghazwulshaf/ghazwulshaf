import React from "react";

export default class Sidebar extends React.Component {
    constructor (props) {
        super(props)
    }
    render () {
        return (
            <section className={this.props.className + " px-6 space-y-4"}>
                <a href="#" className="block pt-6 pb-4 border-b-2">
                    <button className="block w-full py-3 border rounded text-2xl font-semibold shadow">Ghazwul Shaf</button>
                </a>
                <div>
                    <ul className="flex flex-col gap-2 *:dash-item">
                        <a href="#" className="active"><li><i className="fa-solid fa-house"></i> Dashboard</li></a>
                        <a href="#"><li><i className="fa-solid fa-user"></i> User</li></a>
                        <a href="#"><li><i className="fa-solid fa-users"></i> Team</li></a>
                        <a href="#"><li><i className="fa-solid fa-align-left"></i> Profile</li></a>
                        <a href="#"><li><i className="fa-solid fa-image"></i> Portofolio</li></a>
                        <a href="#"><li><i className="fa-solid fa-phone"></i> Contact</li></a>
                        <a href="#"><li><i className="fa-solid fa-gear"></i> Settings</li></a>
                    </ul>
                </div>
            </section>
        )
    }
}