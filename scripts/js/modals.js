const modalSearch = {
    open(){
        document
            .querySelector('.modal-overlay-search')
            .classList
            .add('active')
    },
    close(){
        document
            .querySelector('.modal-overlay-search')
            .classList
            .remove('active')
    },
}

const modalInsertData = {
    open(){
        document
            .querySelector('.modal-overlay-insertdata')
            .classList
            .add('active')
    },

    close(){
        document
            .querySelector('.modal-overlay-insertdata')
            .classList
            .remove('active')
    }
}

const modalConfirmExclusion = {
    open(){
        document
            .querySelector('.modal-confirm-exclusion')
            .classList
            .add('active')
    },

    close(){
        document
            .querySelector('.modal-confirm-exclusion')
            .classList
            .remove('active')
    }
}

const modalChangeData = {
    open(){
        document
            .querySelector('.modal-change-data')
            .classList
            .add('active')
    },

    close(){
        document
            .querySelector('.modal-change-data')
            .classList
            .remove('active')
    }
}