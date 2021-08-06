import React from 'react';

const AppContainer = ({title, children}) => {
    return (
        <div className="container mx-auto mt-3 bg-white p-6 w-1/2 h-auto rounded-2xl shadow-lg  gap-5">
            <h3>{  title }</h3>
              { children }  
        </div>
    );
};

export default AppContainer;
