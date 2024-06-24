document.addEventListener('DOMContentLoaded', (e) => {
    /**
     * Get all elements which is required for this project
     * @var all element list
     */
    const headingCaption = document.querySelector('.heading-caption');
    const searchMenuItem = document.getElementById('search-menu-item');
    const features = document.getElementById('features');
    const featureItems = features ? features.querySelectorAll('.f-item') : null;
    const latestPopular = document.getElementById('latest-popular');
    const listHeading = latestPopular ?  latestPopular.querySelectorAll('.list-heading') : null;
    const cricketPost = document.querySelector('.cricket-post');
    const contactForm = document.getElementById('contact-form');
    const siteWrapper  = document.querySelector('.site-wrapper');
    const allContainers = document.querySelectorAll('.container');



    /**
     * All elements that are under development
     */
    const underDevelopmentElements = document.querySelectorAll('.under-development');


    /**
     * @word color Change of main heading
     * */
    if (headingCaption) {
        const content = headingCaption.textContent.toString().split(/\W/).filter(c => c !== '');
        // console.log(content)
        let newContent = '';
        for (let i = 0; i < content.length; i++) {
            if (i === 0) {
                newContent += `<span class="text-danger" >${content[i]}</span>`;
            } else {
                newContent += ` ${content[i]}`;
            }
        }

        headingCaption.innerHTML = newContent;
    }


    /**
     * @validate heading charecter
     * Make sure that header is not more than 32 character long
     */
    if(featureItems){
        if(featureItems.length > 0){
            featureItemHeadingSubStr(featureItems, true, 70);

            if(featureItems[0]){
                featureItems[0].querySelector('.desc').nextElementSibling.classList.remove('mx-2');
                featureItems[0].querySelector('.desc').previousElementSibling.classList.add('mb-4');
            }
        }
    }



    /**
     * Create responsive website
     */
    const responsiveDesign=()=>{

        /**
         * @layout
         * Change layout of feature for different screen
         */
        if(features){

            if(window.innerWidth > 768){
                /**
                 * @screen
                 * This is for desktop screen
                 */
                const newFeatures = document.createElement('div');
                newFeatures.setAttribute('class', 'row features mt-5');

                const heading2 = document.createElement('h2');
                heading2.setAttribute( 'class', 'text-danger text-center mb-5');
                heading2.textContent = "Featured Posts";
                newFeatures.appendChild(heading2);

                const lgColumn = document.createElement('div');
                lgColumn.setAttribute('class', 'col-md-4');
                newFeatures.appendChild(lgColumn);

                const smColumn1 = document.createElement('div');
                smColumn1.setAttribute('class', 'col-md-4 smColumn1');
                newFeatures.appendChild(smColumn1);

                const smColumn2 = document.createElement('div');
                smColumn2.setAttribute('class', 'col-md-4 smColumn2');
                newFeatures.appendChild(smColumn2);

                let firstOffset = 0;
                const colDivider = 6;

                for (let i = 0; i < featureItems.length; i++) {
                    // First element
                    if (i === 0) {
                        featureItems[i].classList.add('feature-lg-img');
                        featureItems[i].children[0].className = 'col-md-12';
                        featureItems[i].children[1].className = 'col-md-12';
                        lgColumn.append(featureItems[i]);
                    } else {
                        // Start front second element
                        if (0 < i && i <= colDivider) {
                            featureItems[i].classList.add('mb-3');
                            smColumn2.append(featureItems[i]);
                        }

                        if(colDivider < i && i <= featureItems.length - 1){
                            featureItems[i].classList.add('mb-3');
                            smColumn1.append(featureItems[i]);
                        }

                        firstOffset++;
                    }
                }


                if(latestPopular){
                    const latestPost = latestPopular.querySelector('.latest-post');
                    substractCharecterContent(latestPost, 'p', 200);
                }

                substractCharecterContent(cricketPost, 'p', 200);

                features.replaceWith(newFeatures);
            }else{
                /**
                 * @screen
                 * This is for small screen
                 */

                featureItemHeadingSubStr(featureItems, false, 80);

                if(latestPopular){
                    const latestPost = latestPopular.querySelector('.latest-post');
                    substractCharecterContent(latestPost, 'p', 150);
                }
                substractCharecterContent(cricketPost, 'p', 200);



                features.querySelector('.desc').remove();
                const heading = features.querySelectorAll('h3');
                heading.forEach((hi, i)=>{
                    hi.classList.remove('mx-2');
                    hi.nextElementSibling.classList.remove('mx-2');
                });




                // border-bottom border-danger mb-
                const fic = features.querySelectorAll('.col-sm-12');
                fic.forEach((fici, i)=>{
                    fici.classList.add('mb-4');
                    // console.log(fic);
                });
            }
        }

        /**
         * @resize observer
         * When window width will be changed do something
         */
         // const temp = document.createElement('p');
         // temp.setAttribute('class', 'alert alert-danger');
         // siteWrapper.insertBefore(temp, siteWrapper.children[0]);
         const resizeObserver = new ResizeObserver((entries) => {
            for (entry of entries) {

                // get the height and width of the element
                console.log('Height: ', entry.contentRect.height);
                console.log('Width:', entry.contentRect.width);
                // temp.textContent = "Width: " + entry.contentRect.width;
                if(entry.contentRect.width <= 1520 && entry.contentRect.width >= 1220){
                  allContainers.forEach(con=> con.style.width = '75%');
                }else{
                  allContainers.forEach(con=> con.style.width = '100%');
                }
            }
        });

        // observe the given element for changes
        resizeObserver.observe(siteWrapper);


        if(listHeading){
            if(listHeading.length > 0){
                const MAX_CHAR = 95;
                listHeading.forEach((lh, i)=>{
                    if(lh.textContent.toString().length > MAX_CHAR){
                        lh.textContent = lh.textContent.toString().substring(0,MAX_CHAR) + '...';
                    }
                });
            }
        }



        // Cricket posts
        if(cricketPost){
            const cPostHeading =cricketPost.getElementsByTagName('h3');
            const cPostContent =cricketPost.getElementsByTagName('p');
            Array.from(cPostHeading).forEach((cp, i)=>{
                cp.textContent = cp.textContent.toString().substring(0, 50);
            });
            Array.from(cPostContent).forEach((cpc, i)=> cpc.textContent = cpc.textContent.toString().substring(0, 200));
        }
    }
    responsiveDesign();




    /**
     * @incomplete
     * @form
     * Contact form submission
     */
    // console.log(contactForm);
    if(contactForm){
        contactForm.addEventListener('submit', (e)=>{
            e.preventDefault();
            const {endpoint} = e.target.dataset;

            const inputs = e.target.getElementsByTagName('input');
            const textarea = e.target.getElementsByTagName('textarea');

            const params = {};
            /**
             * Making query string from input value
             */
            [...Array.from(inputs), ...Array.from(textarea)].forEach((input, i)=>{
                // console.log({name: input.name, value: input.value});
                params[input.name] = [input.value];
            });
            const queryString = new URLSearchParams(params);
            // console.log(queryString.toString()); // name=Shayon&email=mdshayon0%40gmail.com&message=SOmething


            /**
             * Setting form data and send request though axios
             */
            const formData = new FormData();
            formData.append('action', 'contact');
            formData.append('contact', queryString.toString());

            axios.post(endpoint, formData)
                .then(function (response) {
                    console.log(response.data.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        // .map(function(k) {return esc(k) + '=' + esc(params[k]);})

        });
    }



    /**
     * Create bootstrap modal and display - bootstrap code is in footer.php
     */
    if (underDevelopmentElements.length > 0) {
        // searchMenuItem.addEventListener('click', displayModal);
        underDevelopmentElements.forEach((ude, udei) => {
            ude.addEventListener('click', displayModal);
        });
    }
});


const displayModal = (e) => {
    e.preventDefault();
    const options = {
        backgdrop: true,
        focus: true,
    };
    const myModal = new bootstrap.Modal(document.getElementById('exampleModal'), options);
    myModal.toggle();
};





const featureItemHeadingSubStr=(featureItems, firstItemBlock, MAX_CHAR)=>{
    featureItems.forEach((fi, i)=>{
        const heading = fi.querySelector('h3');
        if(firstItemBlock === true){
            if(i !== 0){
                if(heading.textContent.toString().length > MAX_CHAR){
                    heading.textContent = heading.textContent.toString().substring(0,MAX_CHAR) + '...';
                }
            }
        }else{
            if(heading.textContent.toString().length > MAX_CHAR){
                heading.textContent = heading.textContent.toString().substring(0,MAX_CHAR) + '...';
            }
        }
    });
}



const substractCharecterContent =(container, selector, MAX_CHAR)=>{
    if(container){
        const elements = container.querySelectorAll(selector);
        elements.forEach((elem, i)=>{
            // elem.textContent = elem.textContent.toString().length > MAX_CHAR ? elem.textContent.toString().substring(0, MAX_CHAR) + '...' : elem.textContent;
        });
    }
}
