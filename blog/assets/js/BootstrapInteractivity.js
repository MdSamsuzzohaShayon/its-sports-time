class BootstrapInteractivity {
    constructor(modalId, triggerElements) {
        this.modalId = modalId;
        this.modalElement = document.getElementById(modalId);
        this.triggerElements = triggerElements;
        this.modalOptions = {
            backdrop: true,
            focus: true,
        };

        this.initialize();
    }

    initialize() {
        if (this.triggerElements.length > 0) {
            this.triggerElements.forEach(trigger => {
                trigger.addEventListener('click', (e) => this.displayModal(e));
            });
        }
    }

    displayModal(event) {
        event.preventDefault();
        const myModal = new bootstrap.Modal(this.modalElement, this.modalOptions);
        myModal.toggle();
    }
}

// Initialize the ModalHandler
document.addEventListener('DOMContentLoaded', () => {
    const underDevelopmentElements = document.querySelectorAll('.under-development');
    const modalHandler = new BootstrapInteractivity('exampleModal', underDevelopmentElements);
});
