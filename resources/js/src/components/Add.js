import React from 'react';
import AppContainer from './AppContainer';


const Add = () => {
    return (
        <AppContainer>
            <div >
                <form className="space-y-3">
                    <div>
                        <label>Title</label>
                        <input type="text" name="title" className="mt-3 w-full border border-gray-400 rounded" autoFocus/>
                    </div>
                    <div>
                        <label>Description</label>
                        <textarea type="text" name="title" className="mt-3 w-full border border-gray-400 rounded" rows="3"/>
                    </div>
                    <div>
                        <button type="button" className="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Add</button>
                    </div>
                </form>
            </div>
        </AppContainer>
    );
};

export default Add;
