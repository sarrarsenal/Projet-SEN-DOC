/*jslint */
/*global AdobeEdge: false, window: false, document: false, console:false, alert: false */
(function (compId) {

    "use strict";
    var im='images/',
        aud='media/',
        vid='media/',
        js='js/',
        fonts = {
        },
        opts = {
            'gAudioPreloadPreference': 'auto',
            'gVideoPreloadPreference': 'auto'
        },
        resources = [
        ],
        scripts = [
        ],
        symbols = {
            "stage": {
                version: "5.0.1",
                minimumCompatibleVersion: "5.0.0",
                build: "5.0.1.386",
                scaleToFit: "none",
                centerStage: "none",
                resizeInstances: false,
                content: {
                    dom: [
                        {
                            id: 'fond',
                            type: 'image',
                            rect: ['0px', '0px', '303px', '415px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"fond.jpg",'0px','0px']
                        },
                        {
                            id: 'text',
                            type: 'image',
                            rect: ['-282px', '296px', '264px', '60px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"text.png",'0px','0px']
                        },
                        {
                            id: 'accessible',
                            type: 'image',
                            rect: ['70px', '-48px', '164px', '24px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"accessible.png",'0px','0px']
                        },
                        {
                            id: 'graph-d',
                            type: 'image',
                            rect: ['319px', '29px', '48px', '7px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"graph-d.png",'0px','0px']
                        },
                        {
                            id: 'graph-g',
                            type: 'image',
                            rect: ['-68px', '30px', '48px', '7px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"graph-g.png",'0px','0px']
                        },
                        {
                            id: 'phone12',
                            type: 'image',
                            rect: ['21px', '256px', '11px', '13px', 'auto', 'auto'],
                            opacity: '0',
                            fill: ["rgba(0,0,0,0)",im+"phone12.png",'0px','0px']
                        },
                        {
                            id: 'phone22',
                            type: 'image',
                            rect: ['163px', '256px', '10px', '13px', 'auto', 'auto'],
                            opacity: '0',
                            fill: ["rgba(0,0,0,0)",im+"phone22.png",'0px','0px']
                        },
                        {
                            id: 'th',
                            type: 'image',
                            rect: ['18px', '333px', '264px', '1px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"th.png",'0px','0px']
                        },
                        {
                            id: 'thCopy',
                            type: 'image',
                            rect: ['18px', '334px', '264px', '1px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"th.png",'0px','0px']
                        },
                        {
                            id: 'g-circle',
                            type: 'image',
                            rect: ['206px', '131px', '1px', '1px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"g-circle.png",'0px','0px']
                        },
                        {
                            id: 'p-circle',
                            type: 'image',
                            rect: ['214px', '61px', '1px', '1px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"p-circle.png",'0px','0px'],
                            transform: [[],['191']]
                        },
                        {
                            id: 'wari',
                            type: 'image',
                            rect: ['226px', '86px', '39px', '13px', 'auto', 'auto'],
                            opacity: '0',
                            fill: ["rgba(0,0,0,0)",im+"wari.png",'0px','0px'],
                            transform: [[],['14']]
                        }
                    ],
                    style: {
                        '${Stage}': {
                            isStage: true,
                            rect: ['null', 'null', '303px', '415px', 'auto', 'auto'],
                            overflow: 'hidden',
                            fill: ["rgba(255,255,255,1)"]
                        }
                    }
                },
                timeline: {
                    duration: 13000,
                    autoPlay: true,
                    data: [
                        [
                            "eid30",
                            "top",
                            0,
                            0,
                            "easeOutElastic",
                            "${thCopy}",
                            '334px',
                            '334px'
                        ],
                        [
                            "eid35",
                            "top",
                            1750,
                            750,
                            "easeOutElastic",
                            "${thCopy}",
                            '334px',
                            '289px'
                        ],
                        [
                            "eid3",
                            "left",
                            0,
                            0,
                            "easeOutElastic",
                            "${graph-g}",
                            '-68px',
                            '-68px'
                        ],
                        [
                            "eid5",
                            "left",
                            500,
                            500,
                            "easeOutElastic",
                            "${graph-g}",
                            '-68px',
                            '13px'
                        ],
                        [
                            "eid11",
                            "top",
                            0,
                            0,
                            "easeOutElastic",
                            "${phone12}",
                            '256px',
                            '256px'
                        ],
                        [
                            "eid16",
                            "top",
                            535,
                            965,
                            "easeOutElastic",
                            "${phone12}",
                            '256px',
                            '114px'
                        ],
                        [
                            "eid71",
                            "left",
                            4500,
                            0,
                            "easeOutElastic",
                            "${p-circle}",
                            '214px',
                            '214px'
                        ],
                        [
                            "eid18",
                            "opacity",
                            0,
                            0,
                            "easeOutElastic",
                            "${phone12}",
                            '0',
                            '0'
                        ],
                        [
                            "eid20",
                            "opacity",
                            535,
                            965,
                            "easeOutElastic",
                            "${phone12}",
                            '0',
                            '1'
                        ],
                        [
                            "eid24",
                            "width",
                            1000,
                            1000,
                            "easeOutElastic",
                            "${phone22}",
                            '10px',
                            '122px'
                        ],
                        [
                            "eid46",
                            "width",
                            0,
                            0,
                            "easeOutElastic",
                            "${g-circle}",
                            '1px',
                            '1px'
                        ],
                        [
                            "eid54",
                            "width",
                            3000,
                            750,
                            "easeOutElastic",
                            "${g-circle}",
                            '1px',
                            '79px'
                        ],
                        [
                            "eid10",
                            "height",
                            0,
                            0,
                            "easeOutElastic",
                            "${phone12}",
                            '13px',
                            '13px'
                        ],
                        [
                            "eid17",
                            "height",
                            535,
                            965,
                            "easeOutElastic",
                            "${phone12}",
                            '13px',
                            '155px'
                        ],
                        [
                            "eid32",
                            "top",
                            0,
                            0,
                            "easeOutElastic",
                            "${th}",
                            '333px',
                            '333px'
                        ],
                        [
                            "eid36",
                            "top",
                            1750,
                            750,
                            "easeOutElastic",
                            "${th}",
                            '333px',
                            '364px'
                        ],
                        [
                            "eid28",
                            "opacity",
                            1000,
                            1000,
                            "easeOutElastic",
                            "${phone22}",
                            '0',
                            '1'
                        ],
                        [
                            "eid76",
                            "rotateZ",
                            5000,
                            8000,
                            "easeOutElastic",
                            "${p-circle}",
                            '14deg',
                            '191deg'
                        ],
                        [
                            "eid26",
                            "height",
                            1000,
                            1000,
                            "easeOutElastic",
                            "${phone22}",
                            '13px',
                            '155px'
                        ],
                        [
                            "eid72",
                            "opacity",
                            0,
                            0,
                            "easeOutElastic",
                            "${wari}",
                            '0',
                            '0'
                        ],
                        [
                            "eid74",
                            "opacity",
                            4500,
                            500,
                            "easeOutElastic",
                            "${wari}",
                            '0.000000',
                            '1'
                        ],
                        [
                            "eid59",
                            "top",
                            0,
                            0,
                            "easeOutElastic",
                            "${p-circle}",
                            '114px',
                            '114px'
                        ],
                        [
                            "eid63",
                            "top",
                            3750,
                            750,
                            "easeOutElastic",
                            "${p-circle}",
                            '114px',
                            '61px'
                        ],
                        [
                            "eid68",
                            "top",
                            4500,
                            43,
                            "easeOutElastic",
                            "${p-circle}",
                            '61px',
                            '62px'
                        ],
                        [
                            "eid58",
                            "height",
                            0,
                            0,
                            "easeOutElastic",
                            "${p-circle}",
                            '1px',
                            '1px'
                        ],
                        [
                            "eid66",
                            "height",
                            3750,
                            750,
                            "easeOutElastic",
                            "${p-circle}",
                            '1px',
                            '62px'
                        ],
                        [
                            "eid57",
                            "width",
                            0,
                            0,
                            "easeOutElastic",
                            "${p-circle}",
                            '1px',
                            '1px'
                        ],
                        [
                            "eid65",
                            "width",
                            3750,
                            750,
                            "easeOutElastic",
                            "${p-circle}",
                            '1px',
                            '62px'
                        ],
                        [
                            "eid47",
                            "left",
                            0,
                            0,
                            "easeOutElastic",
                            "${g-circle}",
                            '206px',
                            '206px'
                        ],
                        [
                            "eid50",
                            "left",
                            3000,
                            0,
                            "easeOutElastic",
                            "${g-circle}",
                            '206px',
                            '206px'
                        ],
                        [
                            "eid48",
                            "top",
                            0,
                            0,
                            "easeOutElastic",
                            "${g-circle}",
                            '131px',
                            '131px'
                        ],
                        [
                            "eid55",
                            "top",
                            3000,
                            750,
                            "easeOutElastic",
                            "${g-circle}",
                            '131px',
                            '53px'
                        ],
                        [
                            "eid9",
                            "width",
                            0,
                            0,
                            "easeOutElastic",
                            "${phone12}",
                            '11px',
                            '11px'
                        ],
                        [
                            "eid15",
                            "width",
                            535,
                            965,
                            "easeOutElastic",
                            "${phone12}",
                            '11px',
                            '131px'
                        ],
                        [
                            "eid6",
                            "left",
                            0,
                            0,
                            "easeOutElastic",
                            "${graph-d}",
                            '319px',
                            '319px'
                        ],
                        [
                            "eid8",
                            "left",
                            500,
                            500,
                            "easeOutElastic",
                            "${graph-d}",
                            '319px',
                            '243px'
                        ],
                        [
                            "eid25",
                            "top",
                            1000,
                            1000,
                            "easeOutElastic",
                            "${phone22}",
                            '256px',
                            '114px'
                        ],
                        [
                            "eid49",
                            "height",
                            0,
                            0,
                            "easeOutElastic",
                            "${g-circle}",
                            '1px',
                            '1px'
                        ],
                        [
                            "eid56",
                            "height",
                            3000,
                            750,
                            "easeOutElastic",
                            "${g-circle}",
                            '1px',
                            '79px'
                        ],
                        [
                            "eid39",
                            "left",
                            2196,
                            804,
                            "easeOutElastic",
                            "${text}",
                            '-282px',
                            '18px'
                        ],
                        [
                            "eid2",
                            "top",
                            0,
                            500,
                            "linear",
                            "${accessible}",
                            '-48px',
                            '13px'
                        ]
                    ]
                }
            }
        };

    AdobeEdge.registerCompositionDefn(compId, symbols, fonts, scripts, resources, opts);

    if (!window.edge_authoring_mode) AdobeEdge.getComposition(compId).load("wari_edgeActions.js");
})("EDGE-25954433");
