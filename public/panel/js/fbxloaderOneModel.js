import * as THREE from 'three';
import {OrbitControls} from 'https://unpkg.com/three@0.139.2/examples/jsm/controls/OrbitControls';
import {FBXLoader} from 'https://unpkg.com/three@0.139.2/examples/jsm/loaders/FBXLoader'

var node = $("#sliderCanvas");
var w = node.width();
var h = node.height();

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

function animate() {
    requestAnimationFrame(animate);
    controls.update();
    render();
}

function render() {
    renderer.render(scene, camera);
}

function showModel(modelPath, texturePath) {
    camera.position.set(0, 50, 100);
    loadFBX(modelPath, texturePath);
    animate();
}
