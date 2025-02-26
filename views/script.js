document.addEventListener("DOMContentLoaded", () => {
    fetchContacts();
});

async function fetchContacts() {
    const response = await fetch("../controller/fetch_contacts.php");
    const contacts = await response.json();
    const tableBody = document.getElementById("contactsTable");
    
    tableBody.innerHTML = contacts.map(contact => `
        <tr class="border">
            <td class="border p-2">${contact.id}</td>
            <td class="border p-2">${contact.full_name}</td>
            <td class="border p-2">${contact.email}</td>
            <td class="border p-2">${contact.phone}</td>
            <td class="border p-2">${contact.project_type}</td>
            <td class="border p-2">${contact.message}</td>
            <td class="border p-2">
                <button class="bg-red-500 text-white px-3 py-1 rounded" onclick="deleteContact(${contact.id})">Delete</button>
            </td>
        </tr>
    `).join("");
}

async function deleteContact(id) {
    if (confirm("Are you sure you want to delete this contact?")) {
        await fetch(`../controller/delete_contacts.php?id=${id}`, { method: "DELETE" });
        fetchContacts();  // Refresh table
    }
}
