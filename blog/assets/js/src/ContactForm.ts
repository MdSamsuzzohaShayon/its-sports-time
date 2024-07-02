if (contactForm) {
    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const form = e.target as HTMLFormElement;
        const endpoint = form.dataset.endpoint;

        if (!endpoint) {
            console.error('No endpoint specified in the form dataset');
            return;
        }

        // @ts-ignore
        const inputs = Array.from(form.getElementsByTagName('input'));
        // @ts-ignore
        const textareas = Array.from(form.getElementsByTagName('textarea'));

        const params: { [key: string]: string } = {};

        /**
         * Making query string from input values
         */

        // @ts-ignore
        inputs.concat(textareas).forEach(input => {
            params[input.name] = input.value;
        });

        const queryString = new URLSearchParams(params).toString();

        /**
         * Setting form data and send request through fetch
         */
        const formData = new FormData();
        formData.append('action', 'contact');
        formData.append('contact', queryString);

        try {
            const response = await fetch(endpoint, {
                method: 'POST',
                body: formData,
            });
            const result = await response.json();
            console.log(result.data);
        } catch (error) {
            console.error(error);
        }
    });
}
