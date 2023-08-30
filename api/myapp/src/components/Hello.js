import React from "react";


const Hello = (props) =>{
    return( 
        <div>
        <h1> {props.thank} </h1>
        {props.children}
        
        </div>
    )
}

export default Hello