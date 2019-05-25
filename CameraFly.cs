

using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class CameraFly : MonoBehaviour
{

    public float mouseSensitivity = 3.0f;
    public float speed = 2.0f;
    private Vector3 transfer;

    public float minimumX = -360F;
    public float maximumX = 360F;
    public float minimumY = -60F;
    public float maximumY = 60F;
    float rotationX = 0F;
    float rotationY = 0F;
    Quaternion originalRotation;

    const float minCamX = -2; // минимальная позиция по X
    const float maxCamX = 2; // максимальная позиция по X

    const float minCamY = 1; // минимальная позиция по Y
    const float maxCamY = 2; // максимальная позиция по Y

    const float minCamZ = -3; // минимальная позиция по Z
    const float maxCamZ = 3; // максимальная позиция по Z

    void Start()
    {
        originalRotation = transform.rotation;
        Cursor.visible = false;
    }

    void Update()
    {
        // Движения мыши -> Вращение камеры
        rotationX += Input.GetAxis("Mouse X") * mouseSensitivity;
        rotationY += Input.GetAxis("Mouse Y") * mouseSensitivity;
        rotationX = ClampAngle(rotationX, minimumX, maximumX);
        rotationY = ClampAngle(rotationY, minimumY, maximumY);
        Quaternion xQuaternion = Quaternion.AngleAxis(rotationX, Vector3.up);
        Quaternion yQuaternion = Quaternion.AngleAxis(rotationY, Vector3.left);
        transform.rotation = originalRotation * xQuaternion * yQuaternion;
        // перемещение камеры
        transfer = transform.forward * Input.GetAxis("Vertical");
        transfer += transform.right * Input.GetAxis("Horizontal");
        transform.position += transfer * speed * Time.deltaTime;
        BlockCam();
        if (Input.GetKey("escape")) { Application.Quit(); }
    }

    public static float ClampAngle(float angle, float min, float max)
    {
        if (angle < -360F) angle += 360F;
        if (angle > 360F) angle -= 360F;
        return Mathf.Clamp(angle, min, max);
    }

    // Ограничение камеры
    void BlockCam()
    {
        Vector3 cl = transform.position;

        cl.x = Mathf.Clamp(cl.x, minCamX, maxCamX);
        cl.y = Mathf.Clamp(cl.y, minCamY, maxCamY);
        cl.z = Mathf.Clamp(cl.z, minCamZ, maxCamZ);

        transform.position = cl;
    }

}
