export default function initRatingBar() {
    function loadRating(params) {
        const progressBarContainer = document.getElementById(params.slug);

        const bar = new ProgressBar.Circle(progressBarContainer, {
            color: 'white',
            strokeWidth: 6,
            trailWidth: 3,
            trailColor: '#4A5568',
            easing: 'easeInOut',
            duration: 2500,
            text: {
                autoStyleContainer: false
            },
            from: {color: '#48BB78', width: 6},
            to: {color: '#48BB78', width: 6},
            step: function (state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);

                const value = Math.round(circle.value() * 100);

                circle.setText(value + '%');
            }
        });

        bar.animate(params.rating);
    }

    window.livewire.on('gameWithRatingAdded', params => {
        loadRating(params)
    });
}
