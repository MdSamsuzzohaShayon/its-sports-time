class MenuToggle {
    private menuOpenBtn: HTMLElement;
    private menuCloseBtn: HTMLElement;
    private mainMenuHeader: HTMLElement;

    constructor(menuOpenBtnId: string, menuCloseBtnId: string, mainMenuHeaderId: string) {
        const menuOpenBtn: HTMLElement | null = document.getElementById(menuOpenBtnId);
        const menuCloseBtn: HTMLElement | null = document.getElementById(menuCloseBtnId);
        const mainMenuHeader: HTMLElement | null = document.getElementById(mainMenuHeaderId);

        if (!menuOpenBtn || !menuCloseBtn || !mainMenuHeader) {
            throw new Error("Menu buttons not found");
        }

        this.menuOpenBtn = menuOpenBtn;
        this.menuCloseBtn = menuCloseBtn;
        this.mainMenuHeader = mainMenuHeader;

        this.addEventListeners();
    }

    private addEventListeners(): void {
        this.menuOpenBtn.addEventListener("click", (event: Event) => this.toggleMenu(event, true));
        this.menuCloseBtn.addEventListener("click", (event: Event) => this.toggleMenu(event, false));
    }

    private toggleMenu(event: Event, isOpening: boolean): void {
        event.preventDefault();

        if (isOpening) {
            this.showElement(this.menuCloseBtn);
            this.hideElement(this.menuOpenBtn);
            this.mainMenuHeader.classList.remove("d-none");
        } else {
            this.showElement(this.menuOpenBtn);
            this.hideElement(this.menuCloseBtn);
            this.mainMenuHeader.classList.add("d-none");
        }
    }

    private showElement(element: HTMLElement): void {
        element.classList.remove("d-none");
        element.classList.add("d-block");

    }

    private hideElement(element: HTMLElement): void {
        element.classList.remove("d-block");
        element.classList.add("d-none");

    }
}


export default MenuToggle;

