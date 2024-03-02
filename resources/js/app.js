import './bootstrap';

import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'

Alpine.plugin(focus)
window.Alpine = Alpine;

Alpine.data('notificationsHandler', () => ({
    notices: [],
    visible: [],
    add(notice) {
        notice.id = Date.now()
        this.notices.push(notice)
        this.fire(notice.id)
    },
    fire(id) {
        this.visible.push(this.notices.find(notice => notice.id === id))
    },
    remove(id) {
        const notice = this.visible.find(notice => notice.id === id)
        const index = this.visible.indexOf(notice)
        this.visible.splice(index, 1)
    },
}));

// Alpine.start();
