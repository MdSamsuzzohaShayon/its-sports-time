/**
 * @TypeScript
 *
 * sudo npm install -g typescript
 * Install: https://www.typescriptlang.org/download/
 *
 * tsc --init
 * Initializes a TypeScript project and creates a tsconfig.json file.
 * https://www.typescriptlang.org/docs/handbook/compiler-options.html
 *
 * TypeScript is a typed superset of JavaScript, and it ships type definitions for the DOM API. These definitions are readily available in any default TypeScript project. Of the 20,000+ lines of definitions in lib.dom.d.ts, one stands out among the rest: HTMLElement. This type is the backbone for DOM manipulation with TypeScript.
 * https://www.typescriptlang.org/docs/handbook/dom-manipulation.html
 *
 * tsc --watch main.ts ../ts/main.ts
 * tsc --project ./tsconfig.json --watch
 * The --watch implementation of the compiler relies on Node’s fs.watch and fs.watchFile. Each of these methods has pros and cons.
 * https://www.typescriptlang.org/docs/handbook/configuring-watch.html
 */

import MenuToggle from "./MenuToggle";
import GlobalInteractivity from "./GlobalInteractivity"


document.addEventListener('DOMContentLoaded', (domEvent) => {


    // Instantiate the MenuToggle class with the IDs of the menu buttons
    try {

        // ===== Global =====
        new GlobalInteractivity();

        // ===== Menu =====
        new MenuToggle("menu-open-btn", "menu-close-btn", "main-menu-header");

        // ===== Landing =====

        // ===== Contact =====
    } catch (error) {
        console.error(error);
    }




});


