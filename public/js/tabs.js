const tabElements = [
    {
        id: 'in-progress',
        triggerEl: document.querySelector('#in-progress-tab'),
        targetEl: document.querySelector('#in-progress')
    },
    {
        id: 'completed',
        triggerEl: document.querySelector('#completed-tab'),
        targetEl: document.querySelector('#completed')
    }
];

// options with default values
const options = {
    defaultTabId: 'settings',
    activeClasses: 'text-blue-200 hover:text-gray-600 dark:text-blue-500 dark:hover:text-blue-400 border-blue-600 dark:border-blue-500',
    inactiveClasses: 'text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300',
    onShow: () => {
        console.log('tab is shown');
    }
};
let Tabs=window.Tabs;
const tabs = new Tabs(tabElements, options);
