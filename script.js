let novels = [
    { id: 1, name: 'Novel A', author: 'Author A', year: 2001 },
    { id: 2, name: 'Novel B', author: 'Author B', year: 2002 },
    { id: 3, name: 'Novel C', author: 'Author C', year: 2003 },
    { id: 4, name: 'Novel D', author: 'Author D', year: 2004 },
];

$(document).ready(function() {
    loadNovels();

    $('#novelForm').on('submit', function(e) {
        e.preventDefault();
        const id = $('#novelId').val();
        const name = $('#novelName').val();
        const author = $('#authorName').val();
        const year = $('#publicationYear').val();

        if (id) {
            // Update novel
            const novelIndex = novels.findIndex(novel => novel.id == id);
            novels[novelIndex] = { id: Number(id), name, author, year: Number(year) };
        } else {
            // Insert novel
            const newId = novels.length ? novels[novels.length - 1].id + 1 : 1;
            novels.push({ id: newId, name, author, year: Number(year) });
        }

        $('#novelModal').modal('hide');
        loadNovels();
    });
});

function loadNovels() {
    $('#novelTableBody').empty();
    novels.forEach(novel => {
        $('#novelTableBody').append(`
            <tr>
                <td>${novel.id}</td>
                <td>${novel.name}</td>
                <td>${novel.author}</td>
                <td>${novel.year}</td>
                <td>
                    <button class="btn btn-sm btn-warning" onclick="editNovel(${novel.id})">Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="deleteNovel(${novel.id})">Delete</button>
                </td>
            </tr>
        `);
    });
}

function editNovel(id) {
    const novel = novels.find(novel => novel.id == id);
    $('#novelId').val(novel.id);
    $('#novelName').val(novel.name);
    $('#authorName').val(novel.author);
    $('#publicationYear').val(novel.year);
    $('#novelModal').modal('show');
}

function deleteNovel(id) {
    // Hapus novel berdasarkan ID
    novels = novels.filter(novel => novel.id != id);

    // Update ID semua novel setelah novel yang dihapus
    for (let i = 0; i < novels.length; i++) {
        novels[i].id = i + 1;
    }

    loadNovels();
}
