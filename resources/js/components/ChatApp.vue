<template>
    <div class="chat-app bg-light">
        <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
        <ContactsList :contacts="contacts" @selected="startConversationWith"/>
    </div>
</template>

<script>
    import Conversation from './Conversation';
    import ContactsList from './ContactsList';

    export default {
        props: {
            user: {
                type: Object,
                required: true
            }
        },

        data() {
            return {
                selectedContact: null,
                messages: [],
                contacts: []
            };
        },

        mounted() {
            console.log(this.user);
            axios.get('/contacts')
                .then((response) => {
                    console.log(response.data);
                    this.contacts = response.data;
                })
        },

        methods: {
            startConversationWith(contact) {
                //this.updateUnreadCount(contact, true);
                console.log(contact.id);
                var selectedID = contact.id;
                axios.get('/conversation/' + selectedID)
                    .then((response) => {
                        console.log(response.data);
                        this.messages = response.data;
                        this.selectedContact = contact;
                    })
            },
            saveNewMessage(message) {
                this.messages.push(message);
            }
        },

        components: {
            'Conversation': Conversation,
            'ContactsList': ContactsList
        }
    }
</script>

<style lang="scss" scoped>
.chat-app {
    display: flex;
}
</style>
