class controller {
    constructor() {
        this.doors = document.querySelectorAll('[data-door]');
        this.overlay = document.querySelector("[data-overlay]")
        this.fog = document.querySelector("[data-fog]");
        this.lastUrls = [];
        this.currentDoor = null;

        this.init();
    }

    init() {

        if(this.getAnchor()) {
            let anchor = this.getAnchor().replace('day-', '');
            let door = document.querySelector(`[data-door="${anchor}"]`);
            this.openDoor(door);
        }

        this.doors.forEach(door => {
            door.addEventListener('click', (e) => {
                e.preventDefault();
                let door = e.target.closest('[data-door]')
                this.openDoor(door);
            });
        });

        this.fog.addEventListener('click', (e) => {
            e.preventDefault();
            this.closeOverlay();
        });

        window.addEventListener('popstate', this.popLastHistoryItem);
    }

    openDoor(door) {
        if(door.dataset.locked === 'false') {
            this.currentDoor = door;
            this.fetchDoor(door);
        } else {
            console.log('Nana, Du musst dich noch ein wenig gedulden!');
        }
    }

    async fetchDoor({ href }) {
        let url = href;

        setTimeout(async () => {
            const response = await fetch(url);
            
            const body     = await response.text();
            const parser   = new DOMParser();
            const doc      = parser.parseFromString(body, "text/html");
            
            document.title = doc?.title;

            let data = doc.querySelector("main").innerHTML;

            this.overlay.innerHTML = data;

            //set anchor url
            history.pushState(null, null, `#day-${this.currentDoor.dataset.door}`);
            this.openOverlay();

        }, 300);
    }

    openOverlay() {
        this.overlay.dataset.overlay = "open";
        this.overlay.setAttribute('aria-hidden', 'false');
    }

    closeOverlay() {
        this.overlay.dataset.overlay = "closed";
        this.overlay.setAttribute('aria-hidden', 'true');
        this.overlay.innerHTML = '';
        
        history.pushState(null, null, window.location.pathname);
    }       

    getAnchor() {
        var currentUrl = document.URL,
        urlParts   = currentUrl.split('#');
            
        return (urlParts.length > 1) ? urlParts[1] : false;
    }
    
    isExternalLink = (url) => {
        const tmp = document.createElement('a');
        tmp.href = url;
        return tmp.host !== window.location.host;
    };
}

new controller();