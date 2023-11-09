import React from "react";
import { createRoot } from "react-dom/client";
import App from "./App";

const divsToUpdate = document.querySelectorAll(".bos-wp-placeholder");

divsToUpdate.forEach(div => {
    let props = div.getAttribute("data-props") ?  JSON.parse((div.getAttribute("data-props"))) : {};
    let src = div.getAttribute("data-src");

    let data = {
        props: props,
        src: src
    };

    // console.log("[index.js] component config: " , data);
    createRoot(div).render(<App  {...data} />, div)
    div.classList.remove("bos-wp-placeholder");
});
  
