/**
 * Create bootstrap modal and display - bootstrap code is in footer.php
 */
if (underDevelopmentElements.length > 0) {
    underDevelopmentElements.forEach(ude => {
        ude.addEventListener('click', displayModal);
    });
}

const displayModal = (e: Event) => {
    e.preventDefault();
    const options = {
        backdrop: true,
        focus: true,
    };
    // @ts-ignore
    const myModal = new bootstrap.Modal(document.getElementById('exampleModal')!, options);
    myModal.toggle();
};