import React from "react";
import { createRoot } from "react-dom/client";
// import "./index.css";
import App from "./App";

const divsToUpdate = document.querySelectorAll(".bos-wp-placeholder");

divsToUpdate.forEach(div => {
    let data = JSON.parse(div.getAttribute("data-attrs"));
    data.props = data?.props ? JSON.parse(JSON.stringify(data.props)) : ""; 
    console.log("finding .bos-wp-placeholder to render BOS components with attribute: " , data);
    createRoot(div).render(<App  {...data} />, div)
    div.classList.remove("bos-wp-placeholder")
});



// function OurComponent(props) {
//     const [showSkyColor, setShowSkyColor] = useState(false)
//     const [showGrassColor, setShowGrassColor] = useState(false)
  
//     return (
//       <div className="boilerplate-frontend ns-wp">
//         <p>
//           <button onClick={() => setShowSkyColor(prev => !prev)}>gg Please click  Toggle view sky color</button>
//           {showSkyColor && <span>{props.skyColor}</span>}
//         </p>
//         <p>
//           <button onClick={() => setShowGrassColor(prev => !prev)}>Toggle view grass color</button>
//           {showGrassColor && <span>{props.grassColor}</span>}
//         </p>
//       </div>
//     )
//   }
  

  
