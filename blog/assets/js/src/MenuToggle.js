"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
class MenuToggle {
    constructor(menuOpenBtnId, menuCloseBtnId, mainMenuHeaderId) {
        const menuOpenBtn = document.getElementById(menuOpenBtnId);
        const menuCloseBtn = document.getElementById(menuCloseBtnId);
        const mainMenuHeader = document.getElementById(mainMenuHeaderId);
        if (!menuOpenBtn || !menuCloseBtn || !mainMenuHeader) {
            throw new Error("Menu buttons not found");
        }
        this.menuOpenBtn = menuOpenBtn;
        this.menuCloseBtn = menuCloseBtn;
        this.mainMenuHeader = mainMenuHeader;
        this.addEventListeners();
    }
    addEventListeners() {
        this.menuOpenBtn.addEventListener("click", (event) => this.toggleMenu(event, true));
        this.menuCloseBtn.addEventListener("click", (event) => this.toggleMenu(event, false));
    }
    toggleMenu(event, isOpening) {
        event.preventDefault();
        if (isOpening) {
            this.showElement(this.menuCloseBtn, this.mainMenuHeader);
            this.hideElement(this.menuOpenBtn, this.mainMenuHeader);
        }
        else {
            this.showElement(this.menuOpenBtn, this.mainMenuHeader);
            this.hideElement(this.menuCloseBtn, this.mainMenuHeader);
        }
    }
    showElement(element, menuEl) {
        element.classList.remove("d-none");
        element.classList.add("d-block");
        menuEl.classList.remove("d-none");
    }
    hideElement(element, menuEl) {
        element.classList.remove("d-block");
        element.classList.add("d-none");
        menuEl.classList.add("d-none");
    }
}
exports.default = MenuToggle;
