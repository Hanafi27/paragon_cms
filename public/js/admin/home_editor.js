window.homeEditor = function () {
  return {
    themeColor: '#a81d5d',
    themeIcon: 'sparkle',
    icons: window.SVG_ICONS,
    events: window.EVENT_THEMES.map(e => ({ ...e, active: e.key === 'none', key: e.key, icon: e.icon })),

    toggleEvent(event) {
      this.events.forEach(e => e.active = false)
      event.active = true
      this.themeIcon = event.icon
    },

    get activeEvent() {
      return this.events.find(e => e.active) || this.events[0]
    }
  }
}
