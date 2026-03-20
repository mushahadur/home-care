document.querySelectorAll('.toggle-card').forEach(header => {
    header.addEventListener('click', function () {

        let cardContent = this.nextElementSibling;
        let icon = this.querySelector('.card-icon');

        cardContent.classList.toggle('d-none');

        if (cardContent.classList.contains('d-none')) {
            icon.classList.remove('bi-dash-lg');
            icon.classList.add('bi-plus-lg');
        } else {
            icon.classList.remove('bi-plus-lg');
            icon.classList.add('bi-dash-lg');
        }
    });
});


function previewFiles(input, previewContainer) {
    const previewBox = document.getElementById(previewContainer);
    previewBox.innerHTML = ''; // Clear previous preview

    Array.from(input.files).forEach(file => {
        const fileType = file.type;
        const fileURL = URL.createObjectURL(file);

        const box = document.createElement('div');
        box.classList.add('file-box');

        if (fileType === "application/pdf") {
            box.innerHTML = `
                <iframe src="${fileURL}"></iframe>
                <div class="file-name">${file.name}</div>
            `;
        } else {
            box.innerHTML = `
                <img src="${fileURL}" alt="Preview">
                <div class="file-name">${file.name}</div>
            `;
        }

        previewBox.appendChild(box);
    });
}

document.getElementById('prescriptionUpload').addEventListener('change', function () {
    previewFiles(this, 'prescriptionPreview');
});

document.getElementById('otherDocsUpload').addEventListener('change', function () {
    previewFiles(this, 'otherDocsPreview');
});
