import { CountUp } from 'countup.js';

window.onload = function () {
    document.querySelectorAll('.target').forEach((element) => {
        const counterValue = element.dataset.count;
        const countUp = new CountUp(element, counterValue);

        if (!countUp.error) {
            countUp.start();
        } else {
            console.error(countUp.error);
        }
    });
};
