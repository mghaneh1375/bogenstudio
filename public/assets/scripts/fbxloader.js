// import * as THREE from 'https://cdn.jsdelivr.net/npm/three@0.117.1'
import * as THREE from 'three';
import {OrbitControls} from 'https://unpkg.com/three@0.139.2/examples/jsm/controls/OrbitControls';
// import { OrbitControls } from 'https://cdn.jsdelivr.net/npm/three@0.117.1/examples/jsm/controls/OrbitControls'
import {FBXLoader} from 'https://unpkg.com/three@0.139.2/examples/jsm/loaders/FBXLoader'
// import { TextureLoader } from 'https://unpkg.com/three@0.139.2/examples/jsm/loaders/TextureLoader'

// scene.add(new THREE.AxesHelper(5))

const light = new THREE.PointLight();

var node = $("#sliderCanvas");
var w = node.width();
var h = node.height();

// light.position.set(223, 173, 471);
// scene.add(light);
//
// const ambientLight = new THREE.AmbientLight();
// scene.add(ambientLight);


const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(
    75,
    w / h,
    0.1,
    1000
);

const renderer = new THREE.WebGLRenderer({alpha: true});
renderer.setClearColor( 0xffffff, 0 ); // second param is opacity, 0 => transparent

renderer.setSize(w, h);
node.append(renderer.domElement);

const controls = new OrbitControls(camera, renderer.domElement);
controls.enableDamping = true;
controls.enableZoom = false;
controls.target.set(0, 1, 0);

const fbxLoader = new FBXLoader();

function loadFBX(modelPath, texturePath) {

    fbxLoader.load(
        modelPath,
        (object) => {
            object.traverse(function (child) {

                if(texturePath !== '') {

                    const loader = new THREE.TextureLoader();

                    loader.load(texturePath, function (texture) {
                            child.material = new THREE.MeshBasicMaterial({
                                map: texture
                            });
                        },
                        undefined,
                        function (err) {
                            console.error('An error happened.');
                        }
                    );

                }
            });

            // object.scale.set(.6, .6, .6);
            // object.position.set(0, -200, 0);

            object.scale.set(1, 1, 1);
            object.position.set(0, -50, 0);

            for( var i = scene.children.length - 1; i >= 0; i--)
                scene.remove(scene.children[i]);

            scene.add(object);
        },
        (xhr) => {
            console.log((xhr.loaded / xhr.total) * 100 + '% loaded')
        },
        (error) => {
            console.log(error)
        }
    );

}

// window.addEventListener('resize', onWindowResize, false);
//
// function onWindowResize() {
//     camera.aspect = w / h;
//     camera.updateProjectionMatrix();
//     renderer.setSize(w, h);
//     render()
// }

function animate() {
    requestAnimationFrame(animate);
    controls.update();
    render();
    // console.log(camera.position);
}

function render() {
    renderer.render(scene, camera);
}

var currIdx = 0;

$(document).ready(function () {

    getModels(showModel);

});

var models = null;

function showModel() {

    camera.position.set(0, 50, 100);

    loadFBX(models[currIdx].model, models[currIdx].texture);
    animate();
}

function changeCurrIdx(i) {
    currIdx = i;
    showModel();
}

function getModels(callBack) {

    $.ajax({
        type: 'get',
        url: getModelsPath,
        headers: {
            'accept': 'application/json'
        },
        success: function (response) {
            if(response.status === "ok") {

                models = response.data;
                var bubbles = "";
                for(var i = 0; i < models.length; i++)
                    bubbles += '<div data-idx="' + i +'" class="bubble"></div>';

                $("#bubblesDiv").append(bubbles);

                $('.bubble').on('click', function () {

                    var idx = $(this).attr('data-idx');
                    if(idx != currIdx)
                        changeCurrIdx(idx);

                });

                callBack();
            }
        }
    });

}
