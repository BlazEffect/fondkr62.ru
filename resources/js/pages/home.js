import {Carousel} from "@fancyapps/ui/dist/carousel/carousel.esm.js";
import "@fancyapps/ui/dist/carousel/carousel.css";

const container = document.getElementById("about-me-carousel");
const options = {
    Dots: false,
    infinite: true,
};

new Carousel(container, options);
