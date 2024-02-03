function openModal() {
  // var confirmation =confirm("Apakah Anda yakin ingin menghapus data ini?");
  // if (confirmation) {
  //   deleteData();
  // }
  document.getElementById('deleteConfirmationModal').style.display = 'block';
}

function closeModal() {
  document.getElementById('deleteConfirmationModal').style.display = 'none';
}