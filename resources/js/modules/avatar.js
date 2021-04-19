export default function initAvatar() {
    const avatarPreview = document.querySelector('#avatar-preview');

    if (!avatarPreview) return;

    function showAvatarPreview(e) {
        if (!e.target.files.length) return;

        const allowedTypes = ['image/jpg', 'image/jpeg', 'image/png'];

        const file = e.target.files[0];
        if (allowedTypes.includes(file.type)) {
            const reader = new FileReader();

            reader.readAsDataURL(file);

            reader.onload = e => {
                avatarPreview.src = e.target.result;
            }
        }
    }

    const avatarInput = document.querySelector('#avatar');

    if (avatarInput) {
        avatarInput.addEventListener('change', showAvatarPreview);
    }
}
