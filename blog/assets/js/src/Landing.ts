/**
 * Get all elements which is required for this project
 * @var all element list
 */
const headingCaption = document.querySelector<HTMLDivElement>('.heading-caption');
const contactForm = document.getElementById('contact-form');

/**
 * All elements that are under development
 */
const underDevelopmentElements = document.querySelectorAll<HTMLDivElement>('.under-development');

/**
 * Change color of the main heading
 */
if (headingCaption) {
    const content = headingCaption.textContent ? headingCaption.textContent.split(/\W/).filter(c => c !== '') : [];
    let newContent = '';
    content.forEach((word, index) => {
        if (index === 0) {
            newContent += `<span class="text-danger">${word}</span>`;
        } else {
            newContent += ` ${word}`;
        }
    });
    headingCaption.innerHTML = newContent;
}