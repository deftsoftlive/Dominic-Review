function deleteItem(item) {
  const url = $(item).data('delurl');
  if (confirm("Are you sure you want to delete it!")) {
    window.location.href = url;
  }
}
