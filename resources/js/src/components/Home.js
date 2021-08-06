import React from 'react';
import { Link } from "react-router-dom";
import AppContainer from './AppContainer';


const Home = () => {
    return (
        <AppContainer title="Laravel ReactJS CRUD">
            <Link to="/add" className="float-right bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded mb-3">Add Post</Link>
            <div className="mt-3">
                <table className="table border w-full" id="posts">
                    <thead className="bg-gray-50 text-center">
                        <tr>
                            <th>ID</th>
                            <th>TITLE</th>
                            <th>DESCRIPTION</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr className="text-center border">
                            <td>id</td>
                            <td>title</td>
                            <td>description</td>
                            <td className="p-2">
                                <Link to="/edit/1" className="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded inline-block mr-2">Edit</Link>  
                                <a href="" className="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded inline-block">Delete</a>     
                            </td>   
                        </tr>
                    </tbody>
                </table>
            </div>
        </AppContainer>
    );
};

export default Home;
